<template>
  <select v-model="selectedGenre">
    <option v-for="genre in genres" 
      :value="genre.name"
      :key="genre.name">
    {{genre.name}}
    </option>
  </select>
  </template>
  
  <script>
  
  export default {
    props: {
      value: {
        status: String,
      },
    },
    computed: {
      selectedGenre: {
        get() {
          return this.value;
        },
        set(newValue) {
          this.$emit("input", newValue);
        },
      },
    },
    data() {
      return { 
        genres: [ 
            { id: 1, name: 'ロッド' }, 
            { id: 2, name: 'リール' }, 
            { id: 3, name: 'ルアー' },
            { id: 4, name: 'シンカー' },
            { id: 5, name: 'スナップ・スイベル'},
            { id: 6, name: 'スプリットリング'},
            { id: 7, name: 'エギ'},
            { id: 8, name: 'スッテ'},
            { id: 9, name: 'ツノ'},
            { id: 10, name: 'ハリス・道糸'},
            { id: 11, name: 'ルアーライン'},
            { id: 12, name: 'エギングライン'},
            { id: 13, name: 'バラ鉤・糸付鉤'},
            { id: 14, name: '仕掛け'},
            { id: 15, name: 'ウキ'},
            { id: 16, name: 'ガン玉・割りビシ'},
            { id: 17, name: 'サルカン'},
            { id: 18, name: '天秤'},
            { id: 19, name: 'カゴ'},
            { id: 20, name: 'シモリ'},
            { id: 21, name: 'ウキ止め'},
            { id: 22, name: 'オモリ'},
            { id: 23, name: 'その他'},
        ], 
      };
    },
  };
  </script>