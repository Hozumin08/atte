# Atte
従業員向けのタイムカード機能と日付別の勤務時間の一覧表示が行えるシステムです。
- スタート画面（会員登録画面）
 ![register](https://github.com/Hozumin08/atte/assets/122454277/7942eb85-fbfd-4b1e-9a74-ac7e99a64689)
## 作成目的
COACHTECHでの卒業課題として作成しました。

## 機能
- タイムカード(/timestamp)
  ![timestamp](https://github.com/Hozumin08/atte/assets/122454277/8b65b74d-1cbb-4e5e-a605-c85668f4a42e)
個人用のタイムカードです。ログイン画面、ヘッダーの「ホーム」を選択すると表示されます。<br>
ボタンを押した時点の時間をデータベースに記録します。<br>
始業前は勤務開始、業務中は休憩開始・勤務終了、休憩中は休憩終了と、状況に応じたボタンを表示します。<br>
また、複数回休憩を取ったときも個別に記録を行います。<br>
途中でログアウトした場合も再度ログインすれば直前の状況（業務中・休憩中）に応じたページを表示します。
### ※注意※
<b>勤務終了</b>のボタンを押すと<b>翌日まですべてのボタンが押せなくなります。</b><br>必ず退勤時にのみクリックしてください。<br><br>
- 勤務時間の一覧表示(/attendance)
![attendance](https://github.com/Hozumin08/atte/assets/122454277/5f47895f-ea34-47a3-b00e-d0831edec237)
タイムカード利用者の勤務時間を一覧で表示します。ヘッダーの「日付一覧」を選択すると表示されます。<br>
当日の勤務が表示されるため、別の日の状況を確認したい場合は日付横のボタンで日付を変更します。<br>
一日に複数回休憩を取っている場合、すべて合計したものを「休憩時間」として表示します。

## 使用ツール
Laravel 10.0, Laravel breeze

## テーブル設計
![table](https://github.com/Hozumin08/atte/assets/122454277/17dcafe6-73b7-4b00-8556-a7db8bdf104a)

## ER図
![atte-ER drowio](https://github.com/Hozumin08/atte/assets/122454277/169213f4-43cc-492c-83f3-222b18fb0a65)

## テストユーザー
テスト用に以下のユーザーを登録しています。<br>
山田太郎(yamada@taro)<br>
佐藤二郎(sato@jiro)<br>
田中三郎(tanaka@saburo)<br>	
伊藤四郎(ito@siro)<br>
山本五郎(yamamoto@goro)<br>
勅使河原六郎(tesigahara@rokuro)<br>
松本七郎(matsumoto@sichiro)<br>
(passwordはすべて12345678)
