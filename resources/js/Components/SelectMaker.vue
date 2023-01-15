<template>
<select v-model="selectedMaker">
  <option v-for="maker in makers"
    :value="maker.name"
    :key="maker.name"
    >
  {{maker.name}}
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
    selectedMaker: {
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
      makers: [ 
          { id: 1, name: 'SHIMANO（シマノ）' }, 
          { id: 2, name: 'DAIWA（ダイワ）' }, 
          { id: 3, name: 'AbuGarucia' },
          { id: 4, name: 'Megabass' },
          { id: 5, name: 'deps'},
          { id: 6, name: 'EVERGREEN'},
          { id: 7, name: 'Major Craft'},
          { id: 8, name: 'tailwalk'},
          { id: 9, name: 'パームス'},
          { id: 10, name: 'ガマカツ'},
          { id: 11, name: 'ニッシン'},
          { id: 12, name: 'オリムピック'},
          { id: 13, name: 'アピア'},
          { id: 14, name: 'アリゲーター'},
          { id: 15, name: 'アルファタックル'},
          { id: 16, name: 'ウエダ'},
          { id: 17, name: 'NFT'},
          { id: 18, name: 'オクマ'},
          { id: 19, name: 'オフト'},
          { id: 20, name: 'ガンクラフト'},
          { id: 21, name: 'クレイジーオーシャン'},
          { id: 22, name: '黒鯛工房'},
          { id: 23, name: 'ゴールデンミーン'},
          { id: 24, name: 'ザウルス' }, 
          { id: 25, name: 'ジークラシック' },
          { id: 26, name: 'Gクラフト' },
          { id: 27, name: 'CBワン'},
          { id: 28, name: 'ジャクソン'},
          { id: 29, name: 'ジャッカル'},
          { id: 30, name: 'スタジオミネギシ'},
          { id: 31, name: 'スミス'},
          { id: 32, name: 'セイコー'},
          { id: 33, name: 'ゼスタ'},
          { id: 34, name: 'ゼナック'},
          { id: 35, name: 'ゼニス'},
          { id: 36, name: 'ダイコー'},
          { id: 37, name: 'ツララ'},
          { id: 38, name: 'ティクト'},
          { id: 39, name: 'ティムコ'},
          { id: 40, name: 'テンリュー'},
          { id: 41, name: 'ノリーズ'},
          { id: 42, name: 'バリバス'},
          { id: 43, name: 'バレーヒル'},
          { id: 44, name: 'フェンウィック'},
          { id: 45, name: 'ブリーデン'},
          { id: 46, name: 'ペン'},
          { id: 47, name: 'マミヤOP'},
          { id: 48, name: 'MCワークス'},
          { id: 49, name: 'ヤマガブランクス'},
          { id: 50, name: 'リョービ'},
          { id: 51, name: 'レイドジャパン'},
          { id: 52, name: 'レジットデザイン'},
          { id: 53, name: 'ロデオクラフト'},
          { id: 54, name: 'その他'},
          { id: 56, name:null}
      ], 
    };
  },
};
</script>