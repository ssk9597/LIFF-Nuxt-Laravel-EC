<template>
  <div class="container">
    <div v-if="isSuccess">
      <SuccessAlert />
    </div>
    <div v-if="isFail">
      <FailAlert />
    </div>
    <Header />
    <Hero />
    <Registration :lineLogin="lineLogin" />
    <div class="product">
      <Heading :main="'Product'" :sub="'商品'" />
      <div class="card">
        <div class="card-container" v-for="product in products.contents" :key="product.id">
          <img class="card-product-img" :src="product.image.url" />
          <p class="card-product-name">{{ product.name }}</p>
          <p class="card-product-price">¥{{ product.price }}</p>
          <div class="button">
            <button v-if="idToken" class="button-btn" @click="checkout(product)">購入する</button>
            <button v-else class="button-btn disabled" disabled>購入する</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
// components
import Heading from '@/components/Atoms/Heading';
import SuccessAlert from '@/components/Atoms/SuccessAlert';
import FailAlert from '@/components/Atoms/FailAlert';
import Header from '@/components/Molecules/Header';
import Hero from '@/components/Molecules/Hero';
import Registration from '@/components/Molecules/Registration';

export default {
  components: {
    Heading,
    SuccessAlert,
    FailAlert,
    Header,
    Hero,
    Registration,
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
      isSuccess: false,
      isFail: false,
    };
  },
  updated() {
    setTimeout(() => {
      this.isSuccess = false;
    }, 1000);
    setTimeout(() => {
      this.isFail = false;
    }, 1000);
  },
  methods: {
    async lineLogin() {
      try {
        // IDトークン
        this.idToken = liff.getIDToken();
        if (this.idToken) {
          await this.$axios.$post('/hubspot/store', {
            idToken: this.idToken,
          });
          this.isSuccess = true;
        } else {
          this.isFail = true;
        }
      } catch (err) {
        alert(err);
        alert(err.response.data.error);
        alert(err.response.data.error_description);
      }
    },
    async checkout(product) {
      const url = await this.$axios.$post('/stripe/store', {
        productStripePriceApi: product.stripe_price_api,
        idToken: this.idToken,
      });
      if (url) {
        window.location.href = url;
      }
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

.card {
  &-container {
    border-radius: 10px;
    background: $color_white;
    width: 250px;
    height: 300px;
    margin: 0 auto 30px auto;
  }

  &-product {
    &-img {
      border-radius: 10px 10px 0 0;
      width: 250px;
      height: 150px;
    }

    &-name {
      padding: 20px 0 0 20px;
    }

    &-price {
      padding: 20px 0 20px 20px;
      font-weight: bold;
    }
  }
}

.button {
  text-align: center;
  &-btn {
    display: inline-block;
    width: 200px;
    height: 40px;
    font-size: 18px;
    font-weight: bold;
    background: $color_yellow;
    border-color: transparent;

    &.disabled {
      color: $color_deep_gray;
      background: $color_gray;
    }
  }
}
</style>
