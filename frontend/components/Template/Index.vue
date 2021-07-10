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
  data() {
    return {
      idToken: '',
      profile: '',
    };
  },
  methods: {
    async lineLogin() {
      try {
        // トークン取得
        this.idToken = await liff.getIDToken();
        alert(this.idToken);
        if (this.idToken) {
          //プロフィール取得
          this.profile = await this.$axios.$post('https://api.line.me/oauth2/v2.1/verify', {
            id_token: this.idToken,
            client_id: process.env.LIFF_CHANNEL_ID,
          });
        } else {
          alert('ログイン失敗しました。大変お手数ですがもう1度お試しください');
        }
        console.log(this.profile.email);
      } catch (err) {
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
