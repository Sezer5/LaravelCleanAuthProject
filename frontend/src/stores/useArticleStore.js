import { ref, computed } from 'vue'
import { defineStore } from 'pinia'
import axios from 'axios'

export const useArticleStore = defineStore('articles', {

state: () => ({ 
    articles:[],
    categories:[],
    keywords:[]
}),

actions:{
  async fecthAllArticles(){
      try {
        const response = await axios.get('http://127.0.0.1:8000/api/article')
        this.articles = response.data.data
        this.categories = response.data.categories
        this.keywords = response.data.keywords
      } catch (error) {
        console.log(response.data.data)
      }
    }
   
}



})