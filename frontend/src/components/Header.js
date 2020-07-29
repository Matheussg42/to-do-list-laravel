import React, { useState } from 'react';
import { Link, useHistory } from 'react-router-dom';
import { FiPower } from 'react-icons/fi';
import { AppBar, Toolbar  } from '@material-ui/core';

export default function Header() {
  const [token] = useState(localStorage.getItem('token'));
  const history = useHistory();

  if(token === '' || token === null){
    history.push('/');
  }

  function handleLogout() {
    localStorage.clear();
    history.push('/');
  }

  return (
    <div className="header">
      <AppBar className="menu" position="static">
        <Toolbar>
          <Link to="/financas" className="menuTitle">
            <h1>ToDo List</h1>
          </Link>

          <button className="menuButton" onClick={handleLogout} type="button">
            <FiPower size={18} color="#fff" />
          </button>
        </Toolbar>
      </AppBar>
    </div>
  );
}