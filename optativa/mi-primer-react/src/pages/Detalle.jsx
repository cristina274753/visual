import { useParams, useNavigate } from "react-router-dom";
import { useEffect, useState } from "react";
import { useFavoritesStore } from "../store/useFavoritos";

export default function Detalle() {
  const { id } = useParams();
  const navigate = useNavigate();

  const [film, setFilm] = useState(null);
  const [error, setError] = useState("");

  const addFavorite = useFavoritesStore((s) => s.addFavorite);
  const removeFavorite = useFavoritesStore((s) => s.removeFavorite);
  const isFavorite = useFavoritesStore((s) => s.isFavorite(id));

  useEffect(() => {
    setError("");
    setFilm(null);
    fetch(`https://ghibliapi.vercel.app/films/${id}`)
      .then((res) => {
        if (!res.ok) throw new Error("No se pudo cargar la película");
        return res.json();
      })
      .then((data) => setFilm(data))
      .catch((e) => setError(e.message));
  }, [id]);

  if (error) return <p className="center error">Error: {error}</p>;
  if (!film) return <p className="center">Cargando...</p>;

  function toggleFavorite() {
    if (isFavorite) removeFavorite(film.id);
    else addFavorite({ id: film.id, title: film.title, release_date: film.release_date });
  }

  return (
    <main className="container">
      <button className="link" onClick={() => navigate(-1)}>← Volver</button>

      <section className="detail">
        <h1>{film.title}</h1>
        <p className="muted">
          {film.release_date} · {film.running_time} min · {film.director}
        </p>

        <div className="actions">
          <button className="btn" onClick={toggleFavorite}>
            {isFavorite ? "Quitar de favoritos" : "Añadir a favoritos"}
          </button>
        </div>

        <h2>Sinopsis</h2>
        <p>{film.description}</p>

        <div className="meta">
          <p><strong>Productor:</strong> {film.producer}</p>
          <p><strong>Puntuación RT:</strong> {film.rt_score}</p>
        </div>
      </section>
    </main>
  );
}

