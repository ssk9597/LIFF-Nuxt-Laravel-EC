<template>
  <div class="button">
    <nuxt-link to="/" class="button-btn">トップに戻る</nuxt-link>
  </div>
</template>

<script>
export default {};
</script>

<style lang="scss" scoped>
.button {
  position: relative;
  margin: 20px auto 0 auto;
  width: 200px;
  height: 40px;
  background: $color_yellow;
  border-color: transparent;
  &-btn {
    position: absolute;
    width: 100%;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-size: 18px;
    color: $color_black;
    text-decoration: none;
    font-weight: bold;
  }
}
</style>
