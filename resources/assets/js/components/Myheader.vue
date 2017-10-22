<template>
	<nav class="navbar" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item" href="https://bulma.io">
      <img src="https://bulma.io/images/bulma-logo.png" alt="Bulma: a modern CSS framework based on Flexbox" width="112" height="28">
    </a>

    <div class="navbar-menu is-active">
    	<router-link to="/Home" class='navbar-item'>Home</router-link>
    <router-link to="/About" class='navbar-item'>About</router-link>
    </div>

    <button class="button navbar-burger">
      <span></span>
      <span></span>
      <span></span>
    </button>
  </div>
</nav>
</template>