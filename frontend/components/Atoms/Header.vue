<template>
  <header class="header">
    <p class="header-title">LIFF's Shop</p>
  </header>
</template>

<script>
export default {};
</script>

<style lang="scss" scoped>
// color
$color_black: #2a2b2f;
$color_white: #fff;
$color_gray: #bfbfbe;
$color_yellow: #f5c500;

.header {
  background: $color_black;
  // max-width: 390px;
  // width: 100%;
  height: 50px;
  // margin: 0 auto;
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
