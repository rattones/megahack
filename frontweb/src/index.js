import React from 'react';
import ReactDOM from 'react-dom';
import './index.css';
import App from './App';
import Login from './pages/Login';
import { BrowserRouter, Switch, Route } from 'react-router-dom'
import { Provider } from 'react-redux';
import { Store } from './store';

ReactDOM.render(
    <Provider store={Store}>
    <BrowserRouter>
        <Switch>
            <Route path="/" component={App} />
            <Route path="/login" exact={true} component={Login} />
            <Route path='*' component={Login} />
        </Switch>
    </ BrowserRouter>
    </Provider>
    
    , document.getElementById('root'));