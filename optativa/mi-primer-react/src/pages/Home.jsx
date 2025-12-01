import { useEffect, useState } from "react";
import { Link } from "react-router-dom";

export default function Home() {
  const [films, setFilms] = useState([]);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState("");

  useEffect(() => {
    fetch("https://ghibliapi.vercel.app/films")
      .then((res) => {
        if (!res.ok) throw new Error("No se pudo cargar la API");
        return res.json();
      })
      .then((data) => {
        data.sort((a, b) => (a.release_date < b.release_date ? 1 : -1));
        setFilms(data);
      })
      .catch((e) => setError(e.message))
      .finally(() => setLoading(false));
  }, []);

  if (loading) return <p className="center">Cargando películas...</p>;
  if (error) return <p className="center error">Error: {error}</p>;

  return (
    <main className="container">
      <h1>Películas Studio Ghibli</h1>
      <div className="grid">
        {films.map((film) => (
          <article key={film.id} className="card">
            <h2>{film.title}</h2>
            <p className="muted">{film.release_date}</p>
            <Link className="btn" to={`/pelicula/${film.id}`}>
              Ver detalles
            </Link>
          </article>
        ))}
      </div>
    </main>
  );
}

