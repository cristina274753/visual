import { create } from "zustand";

export const useFavoritesStore = create((set, get) => ({
  favorites: JSON.parse(localStorage.getItem("ghibli:favs") || "[]"),

  addFavorite: (movie) => {
    const favs = get().favorites;
    if (favs.find((m) => m.id === movie.id)) return;
    const next = [...favs, movie];
    localStorage.setItem("ghibli:favs", JSON.stringify(next));
    set({ favorites: next });
  },

  removeFavorite: (id) => {
    const next = get().favorites.filter((m) => m.id !== id);
    localStorage.setItem("ghibli:favs", JSON.stringify(next));
    set({ favorites: next });
  },

  isFavorite: (id) => !!get().favorites.find((m) => m.id === id),
}));

