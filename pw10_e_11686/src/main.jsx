// import { StrictMode } from 'react'
// import { createRoot } from 'react-dom/client'
import React from 'react';
import ReactDOM from 'react-dom/client';
//import bootstrap CSS
import 'bootstrap/dist/css/bootstrap.min.css';
// import './index.css'
import App from './App.jsx';
//import Toatify
import { ToastContainer } from 'react-toastify';
import 'react-toastify/dist/ReactToastify.css';

ReactDOM.createRoot(document.getElementById('root')).render(
	<React.StrictMode>
		<App />
		<ToastContainer />
	</React.StrictMode>,
);
