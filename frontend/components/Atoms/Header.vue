<template>
  <header class="header">
    <div class="blank-space"></div>
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

.blank-space {
  padding-top: 50px;
}
</style>
