import { NavLink } from "react-router-dom";

const linkStyle = ({ isActive }) => ({
  padding: "8px 12px",
  borderRadius: 6,
  textDecoration: "none",
  color: isActive ? "#111827" : "#1f2937",
  background: isActive ? "#93c5fd" : "transparent",
});

export default function Menu() {
  return (
    <header style={{ background: "#e5e7eb" }}>
      <nav
        style={{
          display: "flex",
          gap: 12,
          padding: "12px 16px",
          maxWidth: 960,
          margin: "0 auto",
        }}
      >
        <NavLink to="/" style={linkStyle}>Inicio</NavLink>
        <NavLink to="/favoritos" style={linkStyle}>Favoritos</NavLink>
        <NavLink to="/about" style={linkStyle}>About</NavLink>
      </nav>
    </header>
  );
}

