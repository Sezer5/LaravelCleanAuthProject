<template>
  <div>
    <div v-for="article in articleStore.articles" :key="article.id">{{ article.title }}
      <img :src="article.picture " width="140">
    </div>
    <div v-for="keywords in articleStore.keywords" :key="keywords.id">{{ keywords.name }}
    </div>
  </div>
</template>

<script setup>
import { useArticleStore } from '@/stores/useArticleStore';
import { onMounted } from 'vue';

const articleStore = useArticleStore();

onMounted(()=>{
  articleStore.fecthAllArticles();
})
</script>

<style scoped>

</style>