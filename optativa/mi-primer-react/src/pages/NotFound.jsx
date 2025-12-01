import { Link } from "react-router-dom";

export default function NotFound() {
  return (
    <main className="container center">
      <h1>404 — Página no encontrada</h1>
      <p className="muted">La ruta que buscabas no existe.</p>
      <Link className="btn" to="/">Ir al inicio</Link>
    </main>
  );
}