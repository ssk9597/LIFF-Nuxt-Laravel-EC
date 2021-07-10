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
    async lineLogin() {
      // ログイン
      try {
        // await liff.login();
        // alert('ログインしました');
        // トークン取得
        const idToken = await liff.getIDToken();
        alert(idToken);
        //プロフィール取得
        const profile = await this.$axios.$post('https://api.line.me/oauth2/v2.1/verify', {
          id_token: idToken,
          client_id: process.env.LIFF_CHANNEL_ID,
        });
        alert(profile);
      } catch (err) {
        alert(err);
      }
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
