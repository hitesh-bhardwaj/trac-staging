# ACF Free Setup Guide

## What's Been Created

✅ **4 ACF Field Groups** (in `acf-json/` folder):
1. **Hero Section** - Title, subtitle, buttons
2. **About Section** - Label, image, title, 4 features, subtitle
3. **Services Section** - 4 services with title, description, link, image
4. **Testimonials Section** - 3 testimonials with quote and logo

## Installation Steps

### 1. Install ACF Free Plugin

**On Local Site:**
```bash
1. Go to WordPress Admin → Plugins → Add New
2. Search for "Advanced Custom Fields"
3. Install and Activate
```

**On Production (Hostinger):**
```bash
1. Same steps as local
2. Or download from wordpress.org/plugins/advanced-custom-fields/
3. Upload via FTP to wp-content/plugins/
```

### 2. Verify Field Groups Loaded

1. Go to **WordPress Admin → Custom Fields**
2. You should see 4 field groups:
   - Hero Section
   - About Section
   - Services Section
   - Testimonials Section
3. All should show "Location: Front Page"

### 3. Fill in Content

1. Go to **Pages → Home** (Front Page)
2. Scroll down - you'll see 4 new field group sections
3. Fill in all the fields with your content
4. Upload images where needed
5. **Save/Update** the page

### 4. Update Templates

Now templates need to pull from ACF instead of hardcoded values.

**Example: Hero Section**

**Before (hardcoded):**
```php
<h1>
    <span>Rwanda's Connectivity</span>
    <span>Backbone</span>
</h1>
```

**After (ACF):**
```php
<h1>
    <span><?php echo esc_html(get_field('hero_title_line_1')); ?></span>
    <span><?php echo esc_html(get_field('hero_title_line_2')); ?></span>
</h1>
```

## Remaining Sections to Create

You still need field groups for:
- ❌ Why TrAC (horizontal scroll section)
- ❌ Clients (rotating logos)
- ❌ Our Network (SVG map)
- ❌ FAQs (accordion)
- ❌ CTA (call to action)

**Note:** These can be added later following the same pattern.

## Template Update Checklist

For each section, update the template file in `template-parts/front-page/`:

### Hero (`hero.php`)
- [ ] Line 11-12: Title lines
- [ ] Line 15: Subtitle 1
- [ ] Line 18-19: Subtitle 2
- [ ] Line 26: Primary button text
- [ ] Line 24: Primary button link
- [ ] Line 41: Secondary button text
- [ ] Line 39: Secondary button link

### About (`about.php`)
- [ ] Line 10: Label text
- [ ] Line 16-18: Image
- [ ] Line 27-28: Title
- [ ] Line 31-47: List items (4 items)
- [ ] Line 50-51: Subtitle

### Services (`services.php`)
- [ ] Line 11: Label
- [ ] Line 13-14: Title
- [ ] Each service card (4 total):
  - Title
  - Description
  - Link
  - Image

### Testimonials (`testimonials.php`)
- [ ] Line 26: Label
- [ ] Line 30-35: Title
- [ ] Each testimonial card (3 total):
  - Quote text
  - Company logo

## Testing

After updating templates:

1. **Clear all caches** (WordPress, server, browser)
2. **View front page** - content should display from ACF
3. **Edit in admin** - changes should reflect on frontend
4. **Check animations** - GSAP should still work

## Troubleshooting

**Field groups don't appear:**
- Make sure ACF plugin is activated
- Check that `acf-json` folder has correct permissions
- Try deactivating/reactivating ACF

**Content not showing:**
- Make sure page is set as Front Page (Settings → Reading)
- Check that fields are filled in
- Clear WordPress cache
- Check `get_field('field_name')` spelling

**Need more fields:**
- Go to Custom Fields → Edit Field Group
- Add new fields
- ACF will auto-save to `acf-json/`

## Next Steps

1. Install ACF Free
2. Verify field groups loaded
3. Fill in content in admin
4. Update hero.php template (I'll help with this)
5. Test hero section works
6. Repeat for other sections

Want me to update the hero.php template first so you can see how it works?
