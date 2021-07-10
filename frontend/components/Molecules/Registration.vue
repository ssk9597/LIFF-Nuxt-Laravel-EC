<template>
  <div class="registration">
    <Heading :main="'Registration'" :sub="'会員登録'" />
    <div class="registration-container">
      <p class="registration-container-text">
        本Webサービスでは、ログイン時の認証画面にて許可を頂いた場合のみ、あなたのLINEアカウントに登録されているメールアドレスを取得します。
      </p>
      <p class="registration-container-text">
        取得したメールアドレスは、HubSpotにユーザー登録するIDとして利用する目的以外では使用いたしません。また、法令に定められた場合を除き、第三者への提供はいたしません。
      </p>
      <div class="registration-container-image">
        <img src="@/assets/images/line.png" alt="LINEログイン" @click="childLineLogin" />
      </div>
    </div>
  </div>
</template>

<script>
// components
import Heading from '@/components/Atoms/Heading';
export default {
  components: {
    Heading,
  },
  props: {
    lineLogin: {
      type: Function,
      required: true,
    },
  },
  methods: {
    childLineLogin() {
      this.lineLogin();
    },
  },
};
</script>

<style lang="scss" scoped>
.registration-container {
  width: 250px;
  margin: 0 auto;
  background: $color_white;
  padding: 20px;

  &-text {
    font-size: 0.5rem;
    line-height: 1.5;
    padding-bottom: 10px;
  }

  &-image {
    padding-top: 20px;
    text-align: center;
  }
}
</style>
