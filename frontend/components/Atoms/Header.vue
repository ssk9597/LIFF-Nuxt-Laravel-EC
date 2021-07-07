<template>
  <header class="header">
    <p class="header-title">LIFF's Shop</p>
  </header>
</template>

<script>
export default {};
</script>

<style lang="scss" scoped>
.header {
  position: fixed;
  background: $color_black;
  width: 100%;
  max-width: 390px;
  height: 50px;
  display: flex;
  justify-content: center;
  align-items: center;

  &-title {
    font-size: 20px;
    color: $color_white;
    font-weight: bold;
  }
}
</style>
