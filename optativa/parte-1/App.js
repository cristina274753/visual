import { useState } from 'react';
import './estilos.css';

export default function App() {
  const [contador, setContador] = useState(0);

  const [task, setTask] = useState('');
  const [tasks, setTasks] = useState([]);

  const addTask = () => {
    if (!task.trim()) return;
    setTasks([...tasks, { id: Date.now().toString(), title: task }]);
    setTask('');
  };

  const deleteTask = (id) => {
    setTasks(tasks.filter(t => t.id !== id));
  };

  return (
    <div className="contenedor">

      <h2 className="titulo">CONTADOR</h2>

      <div className="contador">{contador}</div>

      <div className="botonesContador">
        <button onClick={() => setContador(contador + 1)}>Sumar</button>
        <button onClick={() => setContador(contador - 1)}>Restar</button>
      </div>

      <h2 className="titulo">LISTA DE TAREAS</h2>
      <p className="total">Total: {tasks.length}</p>

      <input
        className="input"
        placeholder="ejemplo: hacer act optativa"
        value={task}
        onChange={(e) => setTask(e.target.value)}
      />

      <button className="botonTareas" onClick={addTask}>Añadir</button>

      <div className="lista">
        {tasks.map(item => (
          <div 
            key={item.id} 
            className="tarea"
            onClick={() => deleteTask(item.id)}
          >
            {item.title}
          </div>
        ))}
      </div>

    </div>
  );
}
