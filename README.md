## アサトレ
　自分の主張や考えを伝えるための技術であるアサーションについてトレーニングできるアプリです。


## URL
https://asatra.app/


## 開発した経緯
　自分と同じように、パートナーとのコミュニケーションに悩んでいる人の助けになりたいと思ったことがきっかけです。

　以前の私はパートナーに好かれるようにと、意見が異なっていてもパートナーに合わせることが多く、そのせいで恋愛に息苦しさを感じることがありました。

　また、どうしても受け入れられない価値観などをぶつけられた際に、うまく自分の意見を伝えられず、建設的な話し合いができずにお互いが傷つくだけで終わってしまうこともよくありました。

　そんな時に「[夫婦・カップルのためのアサーション](https://www.amazon.co.jp/%E5%A4%AB%E5%A9%A6%E3%83%BB%E3%82%AB%E3%83%83%E3%83%97%E3%83%AB%E3%81%AE%E3%81%9F%E3%82%81%E3%81%AE%E3%82%A2%E3%82%B5%E3%83%BC%E3%82%B7%E3%83%A7%E3%83%B3-%E9%87%8E%E6%9C%AB%E6%AD%A6%E7%BE%A9-ebook/dp/B08FCDW7M8/ref=sr_1_1?__mk_ja_JP=%E3%82%AB%E3%82%BF%E3%82%AB%E3%83%8A&crid=HDKURG9113TQ&keywords=%E3%82%A2%E3%82%B5%E3%83%BC%E3%82%B7%E3%83%A7%E3%83%B3&qid=1656038633&sprefix=%E3%82%A2%E3%82%B5%E3%83%BC%E3%82%B7%E3%83%A7%E3%83%B3%2Caps%2C287&sr=8-1)」という本に出会い、伝える技術であるアサーションについて知りました。

　相手の意見を尊重しつつ、うまく自分の意見を伝えることができるようになり、恋愛で感じていた息苦しさを軽くすることができました。

　アサーションは一生使えるすばらしい技術です。しかし、気をつけるポイントが多いことや、伝え方が合っているかどうかはパートナーからのフィードバックでしか得られないことなど、習得に難しさを感じることがありました。

　そこで、万人により手軽にアサーションの技術を学んでもらえるように、本アプリの開発に至りました


## アプリ概要

本アプリのコンセプトは以下の２点です。
- アサーティブな文章の作成にかかるユーザーの負担を最小限に抑える
- 作成した文章に対するフィードバックの機会を創出

上記のコンセプトを達成するために、本アプリには以下のような特徴があります。
1. 入力フォームを順番に入力するだけで、アサーティブな文章構造が出来上がる
2. 各入力フォームにコツ及び文章例を設置しており、文章作成時にすぐ参照できる。
3. 検索機能により、同様の悩みを抱えた人が作成したアサーティブな文章を参照できる。
4. いいねやコメント機能により、他ユーザーからのアクション・フィードバックを得られる。


## 機能一覧

#### ユーザー登録関連
- ログイン・ログアウト
  - GoogleAPIによりGoogleログインも可能
- 新規登録・退会（論理削除）
  - 退会したユーザーの投稿はデータとして残したかったため、物理削除ではなく論理削除を採用。
- プロフィール編集
  - メールアドレスの変更について、現在、Googleアカウントで登録したユーザーがメールアドレスを修正するとログインできなくなる仕様になっているため今後修正予定。
- パスワード変更

#### 投稿機能(CRUD)
- 新規作成
- 一覧表示
- 編集
- 削除

#### コメント投稿機能
- 新規作成
- 一覧表示
- 削除

#### いいね機能
- 非同期処理で実装（Vue.js / ajax）

#### 投稿検索機能
- カテゴリー、キーワード検索

#### 投稿並び替え機能
- 投稿日時が新しい順
- 投稿日時が古い順
- いいねが多い順

#### 通知機能
- Laravelのポリモーフィックリレーションを活用

#### その他
- ページネーション
  - 表示数やCSSを独自にカスタマイズ
- レスポンシブWebデザイン
- ハンバーガーメニュー(Bootstrap)


## 使用画面のイメージ（主要ページ抜粋）

【トップページ】

![スクリーンショット 2022-09-16 8 18 04](https://user-images.githubusercontent.com/78774242/190837392-b10af9e1-7cde-494f-ae57-53e4ec78094d.png)


【一覧画面】

![スクリーンショット 2022-09-16 7 48 10](https://user-images.githubusercontent.com/78774242/190837396-514e5d5d-9966-4216-b942-064bb27052e5.png)


【詳細画面】

![スクリーンショット 2022-09-16 8 01 38](https://user-images.githubusercontent.com/78774242/190837400-3c977fa3-60e6-418c-902e-f29b6def5ccb.png)


【作成画面】

![スクリーンショット 2022-09-16 8 03 07](https://user-images.githubusercontent.com/78774242/190837408-c67b9334-c8a8-42f7-b08f-66258f50cef1.png)


## 使用技術

### フロントエンド
- HTML/Sass/Bootstrap/JavaScript

### バックエンド
- PHP 7.4.27
- Laravel 6.20.35

### インフラ
- MySQL 5.7.39
- CentOS7
- さくらのVPS


## DB設計
### ER図
![ER図（修正後） drawio](https://user-images.githubusercontent.com/78774242/176316230-b5dec0cb-44cf-4edf-a822-3b62ee74106d.png)

### 各テーブルについて
| テーブル名 | 説明 |
| --- | --- |
| users | ユーザーの情報 |
| posts | ユーザー投稿の情報 |
| comments | 投稿へのコメントの情報 |
| nices | 投稿へのいいねの情報 |
| notifications | ユーザーへの通知の情報 |
| categories | 投稿のカテゴリー分類の情報 |

## 今後実装したい機能など
- パスワードの再登録機能（「パスワードを忘れた方へ」）
- 投稿入力画面において、デフォルトの文章例以外に、他の人の投稿を文章例として表示させたい
- プロフィール画像の設定
  - 現状は性別ごとにフリー素材のアイコンを設定しているだけだが、今後はユーザーが独自に画像を設定できるようにしたい
- 各準備中ページの実装
- 管理ユーザー関係
  - ログイン・ログアウト
  - 管理ユーザーはデフォルトの「コツ」「例」を編集できるようにする
- 共感力トレーニング機能
  - コメントフォームに共感のコツや例文集などを設置したい
- いいね以外のボタンを設置
  - 「分かる」「応援」ボタン等
- googleアドセンスやamazonアフィリエイト等によりサービスの収益化
- PHPUnitによるテスト
