<template>
  <div>
    <div class="blank-space"></div>
    <div class="hero">
      <img class="hero-img" src="@/assets/images/top.png" alt="ヒーロー" />
    </div>
  </div>
</template>

<script>
export default {};
</script>

<style lang="scss" scoped>
.blank-space {
  padding-top: 50px;
}

.hero {
  height: 300px;

  &-img {
    width: 390px;
    height: 300px;
  }
}
</style>
