<template>
  <div class="home-content-bg">
    <div class="home-content">
      <h2 class="title">2.4 Characters World Records</h2>
      <div class="row">
        <div class="col-xl-7 col-lg-12">
          <ul class="list">
            <li>
              <div class="card card-main w-100">
                <img class="card-img card-main-img" src="../../assets/img/fullBanners/Xiao.jpg" alt="Card image">
              </div>
            </li>
          </ul>
        </div>

        <div class="col-xl-5 col-lg-12">
          <div class="row">
            <div class="col-12">
              <ul class="list">
                <li>
                  <div class="card card-side mb-2 w-100">
                    <div class="card-body">
                      <p class="card-text">
                        With supporting text below as a natural lead-in to
                        additional content.
                      </p>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="card card-side mb-2 w-100">
                    <div class="card-body">
                      <p class="card-text">
                        With supporting text below as a natural lead-in to
                        additional content.
                      </p>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="card card-side mb-2 w-100">
                    <div class="card-body">
                      <p class="card-text">
                        With supporting text below as a natural lead-in to
                        additional content.
                      </p>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {};
</script>

<style>
.title {
  font-size: 3rem;
  text-align: left;
  margin-bottom: 2.5rem;
  font-family: "Mark Pro", Arial, sans-serif;
}
.home-content-bg {
  width: 100%;
  height: 100%;
  background-color: #171332;
  border-bottom: 0.25rem solid #7c82c8;
  padding: 3%;
}
.list {
  list-style: none;
}
.card-side {
  height: 122px;
}
.card-main {
  height: 380px;
  background-image: ("../../assets/img/fullBanners/Xiao.jpg");
  border-radius: 8px;
  background-size: cover;
}
.card-side {
  border-radius: 8px;
  background-color: #1a2430;
}
.card-main-img{
    object-fit: cover;
    height: 100%;
    object-position: 50%;
}
</style>