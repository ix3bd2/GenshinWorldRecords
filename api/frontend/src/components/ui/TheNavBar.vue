<template>
  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
      <a class="navbar-brand" style="padding-top: 0rem; 
     margin-right: 0rem;" href="/">
        <img
          :src="require('@/assets/img/logo.png/')"
          style="width: 85px;padding-top: 0rem; 
     margin-right: 0rem;"
        />
      </a>
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarNav"
        aria-controls="navbarNav"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
         
          <li class="nav-item">
            <a class="nav-link" href="/characters"><img class="navbar-items-icon" src="@/assets/img/characters-icon.webp" />&nbsp;Characters</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/"><img class="navbar-items-icon" src="@/assets/img/spiral-abyss-icon.webp" />Spiral Teams</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/weapons"><img class="navbar-items-icon" src="@/assets/img/weapons-icon.webp" />Weapons</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/artifacts"><img class="navbar-items-icon" src="@/assets/img/artifacts-icon.webp" />Artifacts</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/buffs"><img class="navbar-items-icon" src="@/assets/img/atk-up-icon.webp" />&nbsp;Buffs</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</template>

<script>
export default {

}
</script>

<style>
.navbar {
  box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px,
    rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px,
    rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
  background-color: #111111;
}
.navbar-items-icon{
  width: 26px;
}
</style>