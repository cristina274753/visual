import { useFavoritesStore } from "../store/useFavoritos";
import { Link } from "react-router-dom";

export default function Favoritos() {
  const favorites = useFavoritesStore((s) => s.favorites);
  const removeFavorite = useFavoritesStore((s) => s.removeFavorite);

  return (
    <main className="container">
      <h1>Favoritos</h1>

      {favorites.length === 0 ? (
        <p className="muted">No tienes películas favoritas.</p>
      ) : (
        <div className="grid">
          {favorites.map((f) => (
            <article key={f.id} className="card">
              <h2>{f.title}</h2>
              <p className="muted">{f.release_date}</p>

              <div className="row">
                <Link className="btn" to={`/pelicula/${f.id}`}>Ver detalle</Link>
                <button className="link danger" onClick={() => removeFavorite(f.id)}>
                  Quitar
                </button>
              </div>
            </article>
          ))}
        </div>
      )}
    </main>
  );
}

