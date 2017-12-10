/*
Auction items available for view to all clients
Provides name, item id, category, and current price
 */

var auctionItem = function(name, itemID, category, currentPrice) {
  this.name = name;
  this.itemID = itemID;
  this.category = category;
  this.currentPrice = currentPrice;
}

auctionItem.all = [];
