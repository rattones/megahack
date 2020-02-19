import React from 'react';
import logo from './logo.svg';
import Button from './components/Button'
import Input from './components/Input'
import ModalSplash from './components/ModalSplash'
import { bindActionCreators } from 'redux';
import { clickButton } from './actions';
import { connect } from 'react-redux';
import './App.css';

function App({...props}) {
  const {openedModal, clickButton} = props;
  return (
    <div className="App">
      <header className="App-header">
        <img src={logo} className="logo" alt="logo" />
        <p className="description">WOW, um novo jeito <br />de assistir TV </p>
        <div className={openedModal ? 'hidden' : null}>
        <Button onClick={() => clickButton('login')}>Entrar</Button>
        <Button type="outline">Criar Conta</Button>
        </div>
      </header>
      <ModalSplash type="login" label="Entrar" title="Login" opened={openedModal === 'login'}>
        <Input color="wine" placeholder="E-mail" />
        <Input color="wine" placeholder="Senha" />
        <a href="#" className="forgot">Esqueceu a senha?</a>
      </ModalSplash>
      
      <ModalSplash type="cadastro" label="Entrar" title="Cadastro" opened={openedModal === 'cadastro'}>
        <Input color="green" placeholder="Nome" />
        <Input color="green" placeholder="E-mail" />
        <Input color="green" placeholder="Estado" />
        <Input color="green" placeholder="Senha" />
      </ModalSplash>
    </div>
  );
}

const mapStateToProps = store => ({
  openedModal: store.clickState.openedModal
});

const mapDispatchToProps = dispatch =>
  bindActionCreators({ clickButton }, dispatch);

export default connect(mapStateToProps, mapDispatchToProps)(App);