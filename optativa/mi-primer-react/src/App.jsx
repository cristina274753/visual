import { BrowserRouter, Routes, Route } from "react-router-dom";
import Menu from "./components/Menu";
import Home from "./pages/Home";
import Detalle from "./pages/Detalle";
import Favoritos from "./pages/Favoritos";
import About from "./pages/About";
import NotFound from "./pages/NotFound"; 

export default function App() {
  return (
    <BrowserRouter>
      <Menu />
      <Routes>
        <Route path="/" element={<Home />} />
        <Route path="/pelicula/:id" element={<Detalle />} />
        <Route path="/favoritos" element={<Favoritos />} />
        <Route path="/about" element={<About />} />
        <Route path="*" element={<NotFound />} /> {
}
      </Routes>
    </BrowserRouter>
  );
}

