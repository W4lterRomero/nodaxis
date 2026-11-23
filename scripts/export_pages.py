"""Capture the Laravel-rendered public pages for a GitHub Pages deployment."""
from __future__ import annotations

import os
import re
import shutil
import urllib.request
from pathlib import Path

ROOT = Path(__file__).resolve().parents[1]
OUT = ROOT / "docs"
SOURCE = os.environ.get("STATIC_SOURCE", "http://127.0.0.1:8000").rstrip("/")
PAGES = os.environ.get("PAGES_URL", "https://w4lterromero.github.io").rstrip("/")
BASE_PATH = os.environ.get("PAGES_BASE_PATH", "/nodaxis/")


def fetch(path: str) -> str:
    with urllib.request.urlopen(f"{SOURCE}{path}", timeout=30) as response:
        return response.read().decode("utf-8")


def staticize(html: str) -> str:
    html = html.replace(SOURCE + "/", PAGES + BASE_PATH)
    html = html.replace(SOURCE, PAGES + BASE_PATH.rstrip("/"))
    html = html.replace("http://localhost:8000/", PAGES + BASE_PATH)
    html = html.replace("http://localhost:8000", PAGES + BASE_PATH.rstrip("/"))
    html = html.replace("<meta charset=\"utf-8\">", f'<meta charset="utf-8"><meta name="nodaxis-base" content="{BASE_PATH}">')

    def replace_form(match: re.Match[str], body: str) -> str:
        return body

    html = re.sub(
        r'<form class="newsletter-form".*?</form>',
        lambda m: replace_form(m, '<div class="newsletter-form newsletter-static"><p>Recibe guías prácticas sobre redes, Wi-Fi y seguridad. Escríbenos para suscribirte a Pulso de red.</p><a class="button button-primary" href="mailto:ac23014@ues.edu.sv?subject=Pulso%20de%20red">Quiero recibir Pulso de red</a><small>Al escribirnos, puedes consultar el <a href="' + PAGES + BASE_PATH + 'terminos/">aviso de privacidad</a>.</small></div>'),
        html,
        flags=re.S,
    )
    html = re.sub(
        r'<form class="quote-form".*?</form>',
        '<div class="quote-form static-quote"><h2>Cuéntanos sobre tu proyecto</h2><p>Para solicitar una cotización, escríbenos con tu empresa, ubicación y lo que necesitas conectar.</p><div class="static-quote-actions"><a class="button button-primary" href="https://wa.me/50372311719?text=Hola%2C%20quiero%20solicitar%20una%20cotizaci%C3%B3n%20de%20redes.">Continuar por WhatsApp</a><a href="mailto:ac23014@ues.edu.sv?subject=Solicitud%20de%20cotizaci%C3%B3n%20NODAXIS">Enviar correo</a></div></div>',
        html,
        flags=re.S,
    )
    html = re.sub(
        r'<form class="unsubscribe-form".*?</form>',
        '<div class="unsubscribe-form"><h2>Cancelar suscripción</h2><p>Escríbenos desde el correo que deseas retirar de Pulso de red.</p><a href="mailto:ac23014@ues.edu.sv?subject=Cancelar%20suscripci%C3%B3n%20Pulso%20de%20red">Solicitar baja por correo</a></div>',
        html,
        flags=re.S,
    )
    return html


def main() -> None:
    if OUT.exists():
        shutil.rmtree(OUT)
    OUT.mkdir(parents=True)
    (OUT / ".nojekyll").write_text("", encoding="utf-8")
    pages = {"/": OUT / "index.html", "/terminos": OUT / "terminos" / "index.html", "/cotizar": OUT / "cotizar" / "index.html"}
    for route, destination in pages.items():
        destination.parent.mkdir(parents=True, exist_ok=True)
        destination.write_text(staticize(fetch(route)), encoding="utf-8")
    shutil.copytree(ROOT / "public" / "assets", OUT / "assets")
    shutil.copytree(ROOT / "public" / "build", OUT / "build")
    for css in (OUT / "build" / "assets").glob("*.css"):
        content = css.read_text(encoding="utf-8")
        css.write_text(content.replace("url(/assets/", f"url({BASE_PATH}assets/"), encoding="utf-8")


if __name__ == "__main__":
    main()
