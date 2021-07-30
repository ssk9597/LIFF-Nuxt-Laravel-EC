<template>
  <div class="alert">
    <p class="alert-title">ログインに失敗しました</p>
  </div>
</template>

<script>
export default {};
</script>

<style lang="scss" scoped>
.alert {
  position: fixed;
  z-index: 100;
  background: $color_fail;
  width: 100%;
  max-width: 390px;
  height: 50px;
  display: flex;
  justify-content: center;
  align-items: center;

  &-title {
    font-size: 12px;
    color: $color_white;
  }
}
</style>
