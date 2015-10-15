    <h1 id="CalHeader">Календарь АМ ФАПО</h1>
<?php
        $fapo_calendar = Yii::app()->db->createCommand()
                ->select('cal_id, cal_title, cal_region, cal_canion, cal_begin, cal_end, cal_headcoach, cal_safety_responsible')
                ->from('fapo_calendar')
                ->order('cal_begin desc')
                ->queryAll();
        $recive_count = count($fapo_calendar);
       
        if (count($fapo_calendar) != 0) {

                /// В цикле парсим вывод запросса
                foreach ($fapo_calendar as $fapo_am) {
                        $recive_count = $recive_count - 1;
                        $am_id=array_shift($fapo_am);
                        $am_title=array_shift($fapo_am);
                        $am_region=array_shift($fapo_am);
                        $am_canion=array_shift($fapo_am);
                        $am_begin=array_shift($fapo_am);
                        $am_end=array_shift($fapo_am);
                        $am_headcoach=array_shift($fapo_am);
                        $am_safety_responsible=array_shift($fapo_am); ?>
                        <div class="AMrecord">
                                <h2><?php echo $am_title; ?></h2>
                                <div class="AMdetail">
                                        Район проведения АМ : <?php echo $am_region; ?><br/>
                                        <?php if($am_canion!="") { ?>Ущелье : <?php echo $am_canion; ?><br/><?php } ?>
                                        Сроки проведения:
                                        <?php if (($am_end!="0000-00-00") and ($am_begin != $am_end)) {
                                                echo "c {$am_begin} по {$am_end}";
                                        } else {
                                                echo $am_begin;
                                        } ?><br/>
                                        Главный тренер : <?php echo $am_headcoach; ?><br/>
                                        Ответственный за безопастность : <?php echo $am_safety_responsible; ?><br/>
                                </div>
                        <?php ///Получаем связанные статьи и документы
                        $am_docs = Yii::app()->db->createCommand()
                                ->select('doc_user_name, doc_site_name, u_full_name, doc_upload_date')
                                ->from('site_doc,fapo_doc,site_user')
                                ->where(array('and','u_login=doc_author','fd_doc=doc_id',"fd_am={$am_id}"))
                                ->order('doc_upload_date desc')
                                ->queryAll();
                       
                        if (count($am_docs)!=0) {
                        ?><div class="AMdocs">
                        <h3>Документы</h3>
                                <?php foreach ($am_docs as $am_doc) {
                                        $doc_title = array_shift($am_doc);
                                        $doc_href = "http://$_SERVER[HTTP_HOST]/upload/doc/" . array_shift($am_doc);
                                        $doc_author = array_shift($am_doc);
                                        $doc_upl_date = array_shift($am_doc);
                                        ?>
                                        <div class="AMdoc">
                                                <div class="AMdoc_title">
                                                        <a href="<?php echo $doc_href; ?>"><?php echo $doc_title;?></a>
                                                </div><div class="AMdoc_info">
                                                        <?php echo "{$doc_author} - {$doc_upl_date}"; ?>
                                                </div>
                                        </div>
                                <?php } ?>
                        </div>

                        <?php
                        }
                        $am_artiles = Yii::app()->db->createCommand()
                                ->select('report_article, article_title, u_full_name, article_published')
                                ->from('site_article, site_user, fapo_report')
                                ->where(array('and','u_login=article_author','report_article=article_id',"report_am={$am_id}"))
                                ->order('article_published desc')
                                ->queryAll();
                        if (count($am_artiles)!=0) {?>
                                <div class="AMarticles">
                                        <h3>Статьи</h3>
                                        <?php foreach ($am_artiles as $article) {
                                                $art_id = array_shift($article);
                                                $art_title = array_shift($article);
                                                $art_info = array_shift($article) . " - " . array_shift($article);
                                                ?>
                                                <div class="AMarticle">
                                                        <div class="ArticleTitle">
                                                                <?php echo CHtml::link($art_title,array('/fapoArticles/Default/show/','article'=>$art_id)); ?>
                                                                        </div><div class="ArticleInfo">
                                                                        <?php echo "{$art_info}"; ?>
                                                        </div>
                                                </div>
                                        <?php } ?>
                                </div>
                        <?php }
                        if ($recive_count!=0) {
                                echo "<hr/>";
                        } ?>
                                </div>
                        <?php
                } // Окончание цикла парсинга вывода запросса
        } else {
?>
                <div class="NoFindData">На настоящий момент нет запланированных, прошедших или текущих АМ</div>
<?php          
        }
?>

