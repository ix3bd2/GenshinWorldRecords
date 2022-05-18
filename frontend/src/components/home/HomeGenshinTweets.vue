<template>
  <div class="tweets">
    <h2 class="title-tweet">Latest Tweets</h2>
    <!-- Main 2 topics -->
    <div class="row">
      <div class="col-2">
        <blockquote class="twitter-tweet">
          <p lang="en" dir="ltr">
            &quot;Doushin Shikanoin has admirable wit and insight. While he is
            unfettered and unrestrained in demeanor, one should not dismiss his
            talents. The Tenryou Commission is incredibly fortunate to have such
            a man in their ranks.&quot; - Kamisato Ayato<a
              href="https://twitter.com/hashtag/GenshinImpact?src=hash&amp;ref_src=twsrc%5Etfw"
              >#GenshinImpact</a
            >
            <a href="https://t.co/lM0HNfZktr">pic.twitter.com/lM0HNfZktr</a>
          </p>
          &mdash; Genshin Impact (@GenshinImpact)
          <a
            href="https://twitter.com/GenshinImpact/status/1526141366031376384?ref_src=twsrc%5Etfw"
            >May 16, 2022</a
          >
        </blockquote>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
var TwitterWidgetsLoader = require("twitter-widgets");

export default {
  async created() {
    /*   axios.defaults.headers.common[
        "Authorization"
      ] = `Bearer ${sessionStorage.getItem("token")}`; */
    await axios
      .get(
        "https://publish.twitter.com/oembed?url=" +
          "https://twitter.com/GenshinImpact/status/1526141366031376384"
      )
      .then(
        (response) => {
          console.log(response);
        },
        (error) => {
          error;
        }
      );
  },
  mounted() {
    TwitterWidgetsLoader.load();
  },
};
</script>
Your Vue app should now compile without any errors. 🙂

Hope this helps someone!


};
</script>

<style>
.tweets {
  padding: 3%;
}
.tweets-img {
  border: 2px solid #ffffff50;
  border-radius: 8px;
  box-shadow: rgba(0, 0, 0, 0.56) 0px 22px 70px 4px;
}
.title-tweet{
    font-size: 3rem;
    font-weight: 800;
    text-align: left;
    /* margin-bottom: 4.5rem; */
    margin-top: 1rem;
}
#tweetsCard {
  transition: ease-out 0.3s;
}
#tweetsCard:hover {
  transform: scale(1.02);
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.12), 0 4px 8px rgba(0, 0, 0, 0.06);
}
iframe {
  max-height: 570px !important;
  border: 1px solid black;
  border-radius: 15px;
}
</style>