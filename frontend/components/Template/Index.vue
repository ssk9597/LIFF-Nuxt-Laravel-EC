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
      try {
        // IDトークン
        const idToken = liff.getIDToken();
        alert(idToken);
        if (idToken) {
          await this.$axios.$post('/hubspot/store', {
            idToken: idToken,
          });
        } else {
          alert('ログイン失敗しました。もう一度お試しください。');
        }
      } catch (err) {
        alert(err);
        alert(err.response.data.error);
        alert(err.response.data.error_description);
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
