<div class="row">
    <div class="content">
        <h2 class="title"><?= $no_result_text ?>
        </h2>
        <div class="posts">
            <div class="row">
                <div class="col-md-12">
                    <?php foreach ($results as $result): ?>
                        <div class="row">
                            <div class="panel panel-default">
                                <div class="panel-heading white-link" style="background-color: #fafafa"><a
                                            href="<?= $search->getUrl($result['table_name'], $result['id']) ?>"
                                            rel="bookmark"><?= $result['title'] ?></a></div>
                                <div class="panel-body">
                                    <p><?= \yii\helpers\BaseStringHelper::truncate($result['content'], 300) ?></p>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <?= \yii\widgets\LinkPager::widget([
                        'pagination' => $pagination,
                        'options' => ['class' => 'navi']
                    ]) ?>
                </div>

            </div>
        </div>
    </div>
    <?= $this->render('/layouts/sidebar') ?>
</div>