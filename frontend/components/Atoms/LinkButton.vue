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
  text-align: center;
  &-btn {
    display: inline-block;
    width: 200px;
    height: 40px;
    font-size: 18px;
    font-weight: bold;
    background: $color_yellow;
    border-color: transparent;
  }
}
</style>
