<template>
  <div class="registration">
    <Heading :main="'Registration'" :sub="'会員登録'" />
    <div class="image">
      <img src="@/assets/images/line.png" alt="LINEログイン" @click="childLineLogin" />
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
.image {
  text-align: center;
}
</style>