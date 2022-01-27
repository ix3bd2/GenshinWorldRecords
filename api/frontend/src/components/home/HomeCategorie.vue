<template>
  <div class="categorie">
    <h2 class="title">All Categories</h2>
    <!-- Main 2 topics -->
    <div class="row">
      <div
        class="col-lg-6 col-md-12 mb-3"
        data-aos="fade-right"

      >
        <router-link to="/characters">
          <div id="CategorieCard" class="card bg-dark text-white">
            <img
              class="card-img categorie-img"
              src="../../assets/img/homePage/charactersList.jpeg"
            />
          </div>
        </router-link>
      </div>
      <div
        class="col-lg-6 col-md-12 mb-3"
        data-aos="fade-left"
  
      >
        <router-link to="/spiralabyss">
          <div id="CategorieCard" class="card bg-dark text-white">
            <img
              class="card-img categorie-img"
              src="../../assets/img/homePage/spiralAbyss.jpeg"
            />
          </div>
        </router-link>
      </div>
    </div>
    <!-- More topics -->
    <div class="row">
      <div
        class="col-lg-4 col-md-6 col-sm-12 mb-3"
        data-aos="fade-right"
      >
        <router-link to="/weapons">
          <div id="CategorieCard" class="card bg-dark text-white">
            <img
              class="card-img categorie-img"
              src="../../assets/img/homePage/weaponList.jpeg"
            />
          </div>
        </router-link>
      </div>
      <div
        class="col-lg-4 col-md-6 col-sm-12 mb-3"
        data-aos="fade-up"
      >
        <router-link to="/artifacts">
          <div id="CategorieCard" class="card bg-dark text-white">
            <img
              class="card-img categorie-img"
              src="../../assets/img/homePage/artifactsList.jpeg"
            />
          </div>
        </router-link>
      </div>
      <div
        class="col-lg-4 col-md-6 col-sm-12 mb-3"
        data-aos="fade-left"
      >
        <router-link to="/buffs">
          <div id="CategorieCard" class="card bg-dark text-white">
            <img
              class="card-img categorie-img"
              src="../../assets/img/homePage/buffList.jpeg"
            />
          </div>
        </router-link>
      </div>
    </div>
  </div>
</template>

<script>
export default {
};
</script>

<style>
.categorie {
  padding: 3%;
}
.categorie-img {
  border: 2px solid #ffffff50;
  border-radius: 8px;
  box-shadow: rgba(0, 0, 0, 0.56) 0px 22px 70px 4px;
}
#CategorieCard {
  transition: ease-out 0.3s;
}
#CategorieCard:hover {
  transform: scale(1.02);
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.12), 0 4px 8px rgba(0, 0, 0, 0.06);
}
</style>