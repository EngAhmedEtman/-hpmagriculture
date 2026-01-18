// بيانات المنتجات (كمثال)
const products = [
    { id: 1, name: "سماد عضوي طبيعي", type: "سماد", price: 55.00, image: "images/organic.jpg" },
    { id: 2, name: "سماد نيتروجيني (اليوريا)", type: "سماد", price: 42.50, image: "images/nitrogen.jpg" },
    { id: 3, name: "مبيد حشري شامل", type: "مبيد", price: 85.99, image: "images/insecticide.jpg" },
    { id: 4, name: "مبيد فطري وقائي", type: "مبيد", price: 68.00, image: "images/fungicide.jpg" },
    { id: 5, name: "سماد سائل متوازن NPK", type: "سماد", price: 79.50, image: "images/liquid.jpg" },
    { id: 6, name: "مبيد أعشاب انتقائي", type: "مبيد", price: 120.00, image: "images/herbicide.jpg" },
];

/**
 * وظائف سلة المشتريات (Cart Functions)
 */

// 1. جلب السلة من التخزين المحلي (Local Storage)
function getCart() {
    const cart = localStorage.getItem('agriStoreCart');
    return cart ? JSON.parse(cart) : [];
}

// 2. حفظ السلة في التخزين المحلي
function saveCart(cart) {
    localStorage.setItem('agriStoreCart', JSON.stringify(cart));
    updateCartCount();
}

// 3. تحديث عداد السلة في الترويسة
function updateCartCount() {
    const cart = getCart();
    const count = cart.reduce((total, item) => total + item.quantity, 0);
    const cartCountElement = document.getElementById('cart-count');
    if (cartCountElement) {
        cartCountElement.textContent = count;
    }
}

// 4. إضافة منتج إلى السلة
function addToCart(productId) {
    const cart = getCart();
    const product = products.find(p => p.id === productId);

    if (product) {
        const cartItem = cart.find(item => item.id === productId);

        if (cartItem) {
            cartItem.quantity += 1; // زيادة الكمية إذا كان موجودًا
        } else {
            cart.push({ ...product, quantity: 1 }); // إضافة المنتج بكمية 1
        }

        saveCart(cart);
        alert(`تم إضافة ${product.name} إلى السلة!`);
    }
}

// 5. تحديث كمية المنتج في السلة
function updateQuantity(productId, newQuantity) {
    let cart = getCart();
    const itemIndex = cart.findIndex(item => item.id === productId);

    if (itemIndex > -1) {
        if (newQuantity > 0) {
            cart[itemIndex].quantity = newQuantity;
        } else {
            // حذف المنتج إذا كانت الكمية صفر أو أقل
            cart.splice(itemIndex, 1);
        }
        
        saveCart(cart);
        // إعادة عرض عناصر السلة لتحديث الواجهة في صفحة السلة
        if (document.getElementById('cart-items')) {
            displayCartItems();
        }
    }
}

/**
 * وظائف عرض المنتجات (Display Products Functions)
 */

// دالة مساعدة لإنشاء بطاقة المنتج HTML
function createProductCard(product) {
    const card = document.createElement('div');
    card.classList.add('product-card');
    
    // إنشاء البطاقة (Card)
    card.innerHTML = `
        <img src="${product.image || 'images/placeholder.jpg'}" alt="${product.name}">
        <div class="product-info">
            <h4>${product.name}</h4>
            <p>النوع: ${product.type}</p>
            <span class="price">${product.price.toFixed(2)} ريال</span>
            <button class="btn primary-btn add-to-cart-btn" data-id="${product.id}">أضف إلى السلة</button>
        </div>
    `;

    // إضافة مستمع الحدث لزر "أضف إلى السلة"
    card.querySelector('.add-to-cart-btn').addEventListener('click', () => {
        addToCart(product.id);
    });

    return card;
}


// 1. عرض المنتجات المميزة في الصفحة الرئيسية
function displayFeaturedProducts() {
    const container = document.getElementById('featured-products');
    if (container) {
        // عرض أول 3 منتجات كمميزة
        const featured = products.slice(0, 3); 
        featured.forEach(product => {
            container.appendChild(createProductCard(product));
        });
    }
}

// 2. عرض جميع المنتجات في صفحة المنتجات
function displayAllProducts() {
    const container = document.getElementById('product-list');
    if (container) {
        products.forEach(product => {
            container.appendChild(createProductCard(product));
        });
    }
}


/**
 * وظائف عرض السلة (Display Cart Functions)
 */

// 1. حساب الإجمالي الكلي للسلة
function calculateTotal(cart) {
    return cart.reduce((total, item) => total + (item.price * item.quantity), 0);
}

// 2. إنشاء عنصر (صف) المنتج في السلة HTML
function createCartItemElement(item) {
    const itemDiv = document.createElement('div');
    itemDiv.classList.add('cart-item');
    itemDiv.setAttribute('data-id', item.id);

    itemDiv.innerHTML = `
        <div class="cart-item-details">
            <img src="${item.image || 'images/placeholder.jpg'}" alt="${item.name}">
            <div>
                <h4>${item.name}</h4>
                <p>السعر: ${item.price.toFixed(2)} ريال</p>
                <p>الإجمالي الجزئي: ${(item.price * item.quantity).toFixed(2)} ريال</p>
            </div>
        </div>
        
        <div class="quantity-controls">
            <button class="decrease-btn" data-id="${item.id}">-</button>
            <span class="quantity-value">${item.quantity}</span>
            <button class="increase-btn" data-id="${item.id}">+</button>
            <button class="btn secondary-btn remove-btn" data-id="${item.id}">حذف</button>
        </div>
    `;

    // إضافة مستمعي الأحداث لأزرار التحكم بالكمية والحذف
    itemDiv.querySelector('.increase-btn').addEventListener('click', () => {
        updateQuantity(item.id, item.quantity + 1);
    });

    itemDiv.querySelector('.decrease-btn').addEventListener('click', () => {
        updateQuantity(item.id, item.quantity - 1); // إذا كانت الكمية 1 تصبح 0 وبالتالي يتم الحذف
    });
    
    itemDiv.querySelector('.remove-btn').addEventListener('click', () => {
        // يمكن أيضًا استخدام updateQuantity(item.id, 0); للحذف
        updateQuantity(item.id, 0); 
    });

    return itemDiv;
}

// 3. عرض جميع عناصر السلة في صفحة السلة
function displayCartItems() {
    const itemsContainer = document.getElementById('cart-items');
    const totalElement = document.getElementById('cart-total');
    const summaryDiv = document.getElementById('cart-summary');
    const emptyMessage = document.getElementById('empty-cart-message');

    if (itemsContainer && totalElement && summaryDiv && emptyMessage) {
        const cart = getCart();
        itemsContainer.innerHTML = ''; // مسح المحتويات القديمة

        if (cart.length === 0) {
            summaryDiv.style.display = 'none';
            emptyMessage.style.display = 'block';
        } else {
            cart.forEach(item => {
                itemsContainer.appendChild(createCartItemElement(item));
            });
            
            const total = calculateTotal(cart);
            totalElement.textContent = total.toFixed(2);
            summaryDiv.style.display = 'block';
            emptyMessage.style.display = 'none';
        }
    }
}


/**
 * تهيئة الموقع عند تحميل الصفحة (Initialization)
 */
document.addEventListener('DOMContentLoaded', () => {
    // تحديث عداد السلة في جميع الصفحات
    updateCartCount();

    // تشغيل عرض المنتجات المميزة في الصفحة الرئيسية
    displayFeaturedProducts(); 
});