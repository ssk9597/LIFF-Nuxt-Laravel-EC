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
        const profile = liff.getDecodedIDToken();
        if (profile === null) {
          alert('ログインに失敗しました。もう1度行なってください');
        } else {
          // 名前
          const name = profile.name;
          // サムネイル
          const thumbnail = profile.picture;
          // メールアドレス
          const email = profile.email;

          alert(name);
          alert(thumbnail);
          alert(email);

          // HubSpotにユーザーを登録する
          var options = {
            method: 'POST',
            url: 'https://api.hubapi.com/crm/v3/objects/contacts',
            qs: { hapikey: process.env.HUBSPOT_API_KEY },
            headers: { accept: 'application/json', 'content-type': 'application/json' },
            body: {
              properties: {
                email: email,
                firstname: name,
              },
            },
            json: true,
          };

          axios(options, function (error, response, body) {
            if (error) throw new Error(error);

            console.log(body);
          });

          // this.$axios.$post(
          //   'https://api.hubapi.com/crm/v3/objects/contacts',
          //   {
          //     properties: {
          //       email: email,
          //       firstname: name,
          //     },
          //   },
          //   {
          //     headers: {
          //       accept: 'application/json',
          //       'content-type': 'application/json',
          //     },
          //     qs: {
          //       hapikey: process.env.HUBSPOT_API_KEY,
          //     },
          //   }
          // );
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
