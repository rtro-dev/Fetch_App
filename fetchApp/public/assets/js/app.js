import PokemonManager from './modules/PokemonManager.js';

document.addEventListener('DOMContentLoaded', () => {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
    const baseUrl = document.querySelector('meta[name="base-url"]').content;
    
    const pokemonManager = new PokemonManager(baseUrl, csrfToken);
    pokemonManager.init();
});