$(document).ready(function() {
    
    // 1. モーダルを開く処理 (セレクタでイベントを登録)
    $('.bookmark-btn').on('click', function() {
        const productName = $(this).data('product'); // data-productの値を取得
        
        // 現在の日時を生成 (YYYY-MM-DD HH:MM:SS)
        const now = new Date();
        const datetime = now.getFullYear() + '-' + 
                       String(now.getMonth() + 1).padStart(2, '0') + '-' + 
                       String(now.getDate()).padStart(2, '0') + ' ' + 
                       String(now.getHours()).padStart(2, '0') + ':' + 
                       String(now.getMinutes()).padStart(2, '0') + ':' + 
                       String(now.getSeconds()).padStart(2, '0');

        // 各フィールドに値をセットして表示
        $('#productName').val(productName);
        $('#datetime').val(datetime);
        $('#bookmarkModal').css('display', 'flex').hide().fadeIn(300); // じわっと表示
    });

    // 2. モーダルを閉じる共通関数
    function closeBookmarkModal() {
        $('#bookmarkModal').fadeOut(200, function() {
            $(this).hide();
            $('#bookmarkForm')[0].reset(); // フォームをリセット
        });
    }

    // キャンセルボタン or 閉じる(×)ボタンをクリックした時
    $(document).on('click', '.cancel-btn, .close-btn', function() {
        closeBookmarkModal();
    });

    // モーダル外（背景）をクリックしたら閉じる
    $(window).on('click', function(event) {
        if ($(event.target).is('#bookmarkModal')) {
            closeBookmarkModal();
        }
    });

    // 3. Ajax送信処理（jQuery版）
    $('#bookmarkForm').on('submit', function(e) {
        e.preventDefault(); // デフォルトの送信をキャンセル
        
        const formData = $(this).serialize(); // フォームデータをAjax用にシリアライズ

        $.ajax({
            url: 'save_bookmark.php',
            type: 'POST',
            data: formData,
            dataType: 'json'
        })
        .done(function(data) {
            if(data.success) {
                // 成功：モーダルの中身を「完了画面」に書き換える
                $('.modal-content').html(`
                    <span class="close-btn">&times;</span>
                    <h2 style="color: #b1284b; margin-top: 20px;">お気に入り登録完了</h2>
                    <div style="text-align: center; padding: 20px;">
                        <p>登録ありがとうございました！<br>今後の商品企画の参考にさせていただきます。</p>
                        <button type="button" class="submit-btn close-after" style="margin-top: 20px; width: auto; padding: 10px 30px;">閉じる</button>
                    </div>
                `);
            } else {
                alert('登録に失敗しました: ' + data.message);
            }
        })
        .fail(function() {
            alert('通信エラーが発生しました。もう一度お試しください。');
        });
    });

    // 送信後に生成された「閉じる」ボタンをクリックしたらリロード
    $(document).on('click', '.close-after', function() {
        location.reload(); 
    });
});