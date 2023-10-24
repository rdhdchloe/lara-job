
## サービス概要
本サービスはプログラミングの学習者に向けて求人情報を記録し共有するサービスです。<br>

## サービス URL

https://lara-job.com

---

## 主な機能

### ログイン・新規登録

| ログイン | 新規登録 |
| ---- | ---- |
| ![Image from Gyazo](https://i.gyazo.com/6d1773dbb04e51103f25e1f11b4bbbc3.png)|[![Image from Gyazo](https://i.gyazo.com/ee1f15ac0ebd736cd5de7fa5ba19708c.png)](https://gyazo.com/ee1f15ac0ebd736cd5de7fa5ba19708c) | 

---

## ユーザー機能

| 投稿一覧 | 投稿 | アカウント管理 |
| ---- | ---- |  ---- | 
| [![Image from Gyazo](https://i.gyazo.com/03dc6a6f52474f26769905e7e7ec9814.gif)](https://gyazo.com/03dc6a6f52474f26769905e7e7ec9814) | [![Image from Gyazo](https://i.gyazo.com/c1d56022cb9cc38e0e3b96d11adb70f5.gif)](https://gyazo.com/c1d56022cb9cc38e0e3b96d11adb70f5)　| [![Image from Gyazo](https://i.gyazo.com/cdd0ea6cec1253bff311bb63dff68ccc.gif)](https://gyazo.com/cdd0ea6cec1253bff311bb63dff68ccc) |
| 投稿した求人一覧画面 | 求人の投稿画面 | アカウントの編集、更新画面 |

---

## UXの向上で工夫したところ

| 投稿一覧の表示を非同期でソートする | Tagライブラリーの導入で手入力する手間を減らす | リアルタイムで検索結果を表示される |
| ---- | ---- | ---- |
| [![Image from Gyazo](https://i.gyazo.com/4c58f97c31e05a0538c4eeaf069fc99d.gif)](https://gyazo.com/4c58f97c31e05a0538c4eeaf069fc99d) | [![Image from Gyazo](https://i.gyazo.com/925c40e02dfaf6be3e70ad79918be225.gif)](https://gyazo.com/925c40e02dfaf6be3e70ad79918be225)　| [![Image from Gyazo](https://i.gyazo.com/90d04b82e6c4cc42f3a1ecc13633cfe8.gif)](https://gyazo.com/90d04b82e6c4cc42f3a1ecc13633cfe8) |


---

## 使用技術

**フロントエンド**：
* TailwindCSS
* Laravel Blade
* Heroicon
* Livewire
* Tagify

**バックエンド**：
* PHP 8.1.24
* Laravel 10.28.0
* Laravel Breeze

**データベース**：
* Mysql 8.0

**インフラ**：
* AWS EC2
* AWS Route 53
* Nginx

**API**：
* Yahoo Job API

---

## 想定されるユーザー層
未経験からエンジニア転職している方<br>
エンジニアの学習をされている方<br>
求人情報をまとめて管理したい方<br>

---

## ユーザーの課題
似たような求人が多くてうまく絞りきれない<br>
掲載された情報量が多くて必要な情報だけを参考したい<br>
複数の求人媒体を使うとうまく情報整理できない

---

## Webアプリを作るきっかけ

プログラミングスクールを卒業後、就活フェーズに入り、エンジニア業界のリサーチや求人の情報収集に効率が悪いと感じました。<br>
効率よく自分に必要な求人情報収をまとめる方法があったらと思いました。

---
## サービスの目的・ゴール
求人情報をメモすることで自分に合う求人を効率よくまとめること。

---
## 実装している機能

* Laravel Breezeを用いたユーザー認証
* 求人CRUD
* 検索・検索プレビュー
* タグ・タグでの絞り込み
* 投稿一覧
* アカウント管理
* レスポンシブ対応



## ER図
[![Image from Gyazo](https://i.gyazo.com/8a08295928d48d56d45e011691d78384.png)](https://gyazo.com/8a08295928d48d56d45e011691d78384)