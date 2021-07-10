<template>
  <div class="container">
    <Header />
    <Hero />
    <Registration :lineLogin="lineLogin" />
    <Product :products="products" :buyProducts="buyProducts" />
  </div>
</template>

<script>
// components
import Header from '@/components/Molecules/Header';
import Hero from '@/components/Molecules/Hero';
import Registration from '@/components/Molecules/Registration';
import Product from '@/components/Molecules/Product';

export default {
  components: {
    Header,
    Hero,
    Registration,
    Product,
  },
  props: {
    products: {
      type: Object,
      required: true,
    },
  },
  methods: {
    lineLogin() {
      // ログイン
      if (!liff.isLoggedIn()) {
        liff.login({ redirectUri: 'https://deploy-preview-3--liff-nuxt-laravel-ec.netlify.app/' });
        alert('ログインしました');
      } else {
        alert('ログインしていました');
      }
      // プロフィール取得
      liff
        .getProfile()
        .then(profile => {
          alert(
            `userID: ${profile.userId}, name: ${profile.displayName}, image: ${profile.pictureUrl}`
          );
        })
        .catch(err => {
          alert('error', err);
        });

      const idToken = liff.getIDToken();
      alert(idToken);
      console.log('LINEログインをクリックしました');
    },
    buyProducts(products) {
      console.log(products);
      console.log('商品を購入する');
    },
  },
};
</script>

<style lang="scss">
.container {
  margin: 0 auto;
  background: $color_gray;
  width: 100%;
  max-width: 390px;
  padding-bottom: 60px;
}
</style>
