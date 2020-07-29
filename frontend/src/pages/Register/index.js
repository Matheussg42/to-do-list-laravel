import React, { useState } from 'react';
import { Link, useHistory } from 'react-router-dom';
import { FiArrowLeft } from 'react-icons/fi';

import api from '../../services/api';
import './styles.css';

export default function Register() {
  const [name, setName] = useState('');
  const [email, setEmail] = useState('');
  const [password, setPassword] = useState('');
  const [confirmPassword, setConfirmPassword] = useState('');

  const history = useHistory();

  async function handleRegister(e) {
    e.preventDefault();

    const data = {
      "name":name,
      "email":email,
      "password":password,
      "password_confirmation":confirmPassword,
    };
    
    try {
      await api.post('api/register', data)
      .then(async (res) =>{
        if(res.data.status){
          const responseLogin = await api.post('api/login', { email, password });
          localStorage.setItem('token', responseLogin.data.token);
          history.push('/lists');
        }
      });
    } catch (err) {
      alert('Erro no cadastro, tente novamente.');
    }
  }

  return (
    <div className="register-container">
      <div className="content">
        <section>
          <h1>Cadastro</h1>
          <p>Faça seu cadastro, entre na plataforma e organize a suas finanças.</p>

          <Link className="back-link" to="/">
            <FiArrowLeft size={16} color="#3498db" />
            Já possuo cadastro
          </Link>
        </section>

        <form onSubmit={handleRegister}>
          <input 
            placeholder="Seu Nome"
            value={name}
            onChange={e => setName(e.target.value)}
          />

          <input 
            type="email" 
            placeholder="Seu E-mail"
            value={email}
            onChange={e => setEmail(e.target.value)}
          />

          <input 
            placeholder="Digite sua Senha"
            value={password}
            type="password"
            onChange={e => setPassword(e.target.value)}
          />

          <input 
            placeholder="Confirme sua Senha"
            value={confirmPassword}
            type="password"
            onChange={e => setConfirmPassword(e.target.value)}
          />

          <button className="button" type="submit">Cadastrar</button>
        </form>
      </div>
    </div>
  );
}