<?php
	/* 
	Template name: Мебель на заказ
	*/
	get_header() 
?>

    <main>
        <section class="page-header">
            <div class="container">
                <h1><?php the_title();?></h1>
            </div>
        </section>

        <section class="custom-furniture">
            <div class="container">
                <div class="furniture-cards">
                    <?php 
                            $loop = CFS()->get('furniture_list'); 
                           
                            foreach($loop as $row){
                                ?>
                                 <div class="furniture-card">
                                    <img src="<?= $row['furniture_img']?>" 
                                    alt="<?= get_post_meta(attachment_url_to_postid($row['furniture_img']), '_wp_attachment_image_alt', true)?>">
                                   
                                    <div class="card-content">
                                        <h3><?= $row['furniture_title']?></h3>
                                        <p><?= $row['furniture_text']?></p>
                                        <p class="card-duration">Срок изготовления: <?= $row['furniture_deadlines']?></p>
                                        <p class="card-duration">Стоимость: от <?= $row['furniture_price']?> &#8381;</p>
                                        <button class="btn btn-primary order-btn" onclick="openOrderForm('Мебель для гостиной')">Заказать</button>
                                    </div>
                                </div>
                            <?php 
                           
                            }

                        ?>
                </div>
            </div>
        </section>
        <section class="catalog-seo">
            <div class="container">
                <div class="seo-content">
                    <h2>Лестницы на заказ от производителя BERKEM</h2>
                    <p>Компания BERKEM предлагает изготовление лестниц на заказ по индивидуальным размерам. Мы производим лестницы из натурального дерева более 10 лет, используя качественные материалы и современные технологии обработки древесины.</p>
                    
                    <h3>Виды лестниц в нашем каталоге</h3>
                    <p>В каталоге представлены различные типы лестниц для частного дома и квартиры:</p>
                    <ul>
                        <li><strong>Маршевые лестницы</strong> — классическое решение с прямыми или поворотными маршами. Оптимальны для просторных помещений, обеспечивают удобное и безопасное перемещение между этажами.</li>
                        <li><strong>Винтовые лестницы</strong> — компактное решение для небольших помещений. Экономят пространство, сохраняя функциональность и эстетичный внешний вид.</li>
                        <li><strong>Лестницы на металлокаркасе</strong> — прочные конструкции с деревянными ступенями. Сочетают надёжность металла и красоту натурального дерева.</li>
                        <li><strong>Лестницы с забежными ступенями</strong> — позволяют эффективно использовать пространство при повороте марша.</li>
                    </ul>

                    <h3>Материалы для изготовления лестниц</h3>
                    <p>Для производства лестниц мы используем древесину ценных пород:</p>
                    <ul>
                        <li><strong>Дуб</strong> — прочная древесина с выраженной текстурой, устойчивая к износу и влаге.</li>
                        <li><strong>Бук</strong> — твёрдая древесина светлых оттенков, хорошо поддаётся обработке.</li>
                        <li><strong>Ясень</strong> — эластичная древесина с красивым рисунком, устойчивая к нагрузкам.</li>
                        <li><strong>Сосна</strong> — доступный материал с приятной текстурой и смолистым ароматом.</li>
                    </ul>

                    <h3>Преимущества заказа лестницы в BERKEM</h3>
                    <ul>
                        <li>Индивидуальное проектирование с учётом особенностей вашего помещения</li>
                        <li>Использование экологически чистых материалов и безопасных лакокрасочных покрытий</li>
                        <li>Собственное производство — контроль качества на всех этапах</li>
                        <li>Гарантия на продукцию до 5 лет</li>
                        <li>Профессиональный замер, доставка и монтаж</li>
                    </ul>

                    <p>Закажите бесплатную консультацию нашего специалиста — мы поможем подобрать оптимальное решение для вашего дома и рассчитаем стоимость лестницы по вашим размерам.</p>
                </div>
            </div>
        </section>

        <!-- Order Form Modal -->
        <div id="order-modal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeOrderForm()">&times;</span>
                <h2>Заказать мебель на заказ</h2>
                <form id="order-form">
                    <input type="text" placeholder="Ваше имя" required>
                    <input type="tel" placeholder="Ваш телефон" required>

                    <select id="furniture-type" required>
                        <option value="" disabled selected>Что заказываете?</option>
                        <option value="Гостиная">Мебель для гостиной</option>
                        <option value="Спальня">Мебель для спальни</option>
                        <option value="Кухня">Кухонный гарнитур</option>
                        <option value="Офис">Офисная мебель</option>
                    </select>

                    <textarea placeholder="Опишите свои пожелания"></textarea>
                    <label class="checkbox-label">
                        <input type="checkbox" required>
                        <span>Я согласен на <a href="personal-data.html" target="_blank">обработку персональных данных</a> в соответствии с <a href="privacy.html" target="_blank">политикой конфиденциальности</a></span>
                    </label>
                    <button type="submit" class="btn btn-primary">Заказать консультацию</button>
                </form>
            </div>
        </div>
    </main>

    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-info">
                    <p class="footer-email">info@berkem.ru</p>
                    <p class="footer-phone">+7 (123) 456-78-90</p>
                </div>
                <div class="footer-links">
                    <a href="privacy.html">Политика конфиденциальности</a>
                    <a href="personal-data.html">Политика обработки персональных данных</a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        function openOrderForm(furnitureType) {
            document.getElementById('order-modal').style.display = 'block';
            document.getElementById('furniture-type').value = furnitureType;
        }

        function closeOrderForm() {
            document.getElementById('order-modal').style.display = 'none';
        }

        // Close modal when clicking outside of it
        window.onclick = function(event) {
            const modal = document.getElementById('order-modal');
            if (event.target === modal) {
                modal.style.display = 'none';
            }
        }
    </script>
    
    <style>
        /* Modal styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 30px;
            border: none;
            border-radius: 8px;
            width: 80%;
            max-width: 500px;
            position: relative;
        }

        .close {
            position: absolute;
            right: 15px;
            top: 10px;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover,
        .close:focus {
            color: #8B4513;
        }

        #order-form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .checkbox-label {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            font-size: 14px;
            color: #666;
        }

        .checkbox-label input[type="checkbox"] {
            margin-top: 3px;
            flex-shrink: 0;
        }

        .checkbox-label a {
            color: #8B4513;
            text-decoration: underline;
        }

        .checkbox-label a:hover {
            text-decoration: none;
        }

        .furniture-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 30px;
        }
        
        .furniture-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        
        .furniture-card img {
            width: 100%;
            height: 250px;
            object-fit: cover;
        }
        
        .card-content {
            padding: 20px;
        }
        
        .card-content h3 {
            margin-bottom: 10px;
            color: #8B4513;
        }
        
        .card-content p {
            margin-bottom: 10px;
            color: #666;
        }
        
        .card-duration {
            font-weight: bold;
            color: #333;
        }
        
        .order-btn {
            width: 100%;
            margin-top: 15px;
        }
    </style>
</body>
</html>