<template>
  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
      <router-link to="/">
        <a class="navbar-brand" style="padding-top: 0rem; margin-right: 0rem">
          <img
            src="@/assets/img/logo.webp"
            style="width: 85px; padding-top: 0rem; margin-right: 0rem"
          />
        </a>
      </router-link>

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
            <router-link to="/characters">
              <a class="nav-link"
                ><img
                  class="navbar-items-icon"
                  src="@/assets/img/characters-icon.webp"
                />&nbsp;Characters</a
              >
            </router-link>
          </li>
          <li class="nav-item">
            <router-link to="/spiralAbyss">
              <a class="nav-link"
                ><img
                  class="navbar-items-icon"
                  src="@/assets/img/spiral-abyss-icon.webp"
                />Abyss Teams<sup>
                  <span class="badge bg-danger">soon</span></sup
                >
              </a>
            </router-link>
          </li>
          <li class="nav-item">
            <router-link to="/weapons">
              <a class="nav-link"
                ><img
                  class="navbar-items-icon"
                  src="@/assets/img/weapons-icon.webp"
                />Weapons</a
              >
            </router-link>
          </li>
          <li class="nav-item">
            <router-link to="/artifacts">
              <a class="nav-link"
                ><img
                  class="navbar-items-icon"
                  src="@/assets/img/artifacts-icon.webp"
                />Artifacts</a
              >
            </router-link>
          </li>
          <li class="nav-item">
            <router-link to="/buffs">
              <a class="nav-link"
                ><img
                  class="navbar-items-icon"
                  src="@/assets/img/atk-up-icon.webp"
                />&nbsp;Buffs</a
              >
            </router-link>
          </li>
          <!--  <li class="nav-item">
            <a class="nav-link" href="/patreon"
              ><img
                style="width:21px"
                src="@/assets/img/patreon-logo.png"
              />&nbsp;Patreon</a
            >
          </li> -->
        </ul>
      </div>
    </div>
  </nav>
</template>

<script>
export default {};
</script>

<style>
.navbar {
  box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px,
    rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px,
    rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
  background-color: #111111;
}
.navbar-items-icon {
  width: 26px;
}
sup {
  top: -0.5em;
  position: relative;
  font-size: 75%;
  line-height: 0;
  vertical-align: baseline;
}
.badge {
  margin: 1px;
  padding: 0.25em 0.35em !important;
}
</style>