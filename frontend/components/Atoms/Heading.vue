<template>
  <div class="heading">
    <h2 class="heading-main">{{ main }}</h2>
    <p class="heading-sub">{{ sub }}</p>
  </div>
</template>

<script>
export default {
  props: {
    main: {
      type: String,
      required: true,
    },
    sub: {
      type: String,
      required: true,
    },
  },
};
</script>

<style lang="scss" scoped>
.heading {
  margin: 60px 0 30px 0;
  text-align: center;
  &-main {
    font-size: 32px;
    margin-bottom: 10px;
  }

  &-sub {
    font-size: 16px;
  }
}
</style>
