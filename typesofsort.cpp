/*
1)SELECTION SORT[timecomplex=O(n^2); space=O(1) as only variables are declared]
#include <iostream>
using namespace std;
int SelectionSort(int arr[],int n){
      for (int i = 0; i < n-1; i++)
      {
        int index=i;
        for (int j = i+1; j < n; j++)
        {
          
            index=j;
          
        }
        swap(arr[index],arr[i]);
      }
      
    }
int main(){
  int n=5;
  int arr[n]={4,3,5,1,2};
  SelectionSort(arr,n);
  for (int i = 0; i < n; i++)
  {
    cout<<arr[i];
  }
  
    return 0; 
}*/
/* insertion sort
#include <iostream>
#include <iomanip>
#include <bits/stdc++.h>
#include <vector>
using namespace std;
void InsertionSort(int arr[],int n){
  for (int i = 0; i < n; i++)
  {
    int temp=arr[i];
    int j = i-1;
    for ( ; j >=0; j++) 
    { 
      if(arr[j]>temp){
        //shift
        arr[j+1]=arr[j];
      } 
      else{ //ruk jao
        break;
      }
    }
    arr[j+1]=temp;
  }
}
int main(){
  int n=5;
  int arr[n]={6,4,5,3,1};
  InsertionSort(arr,n);
  for (int i = 0; i < n; i++)
  {
    cout<<arr[i];
  }
  
}
*/
#include <iostream>
#include <iomanip>
#include <bits/stdc++.h>
#include <vector>
using namespace std;
int main(){
  int arr[4]={2,1,5,3};
  sort(arr,arr+4);
  int high,mid,low;
  while(low<=high){
    high=4;
    low=0;
    if(high==low){
      cout<<"Dounf";
    }
    mid=(high+low)/2;
    if(arr[mid]>3){
      high=mid-1;
    }
    if(arr[mid]<3){
      low=mid+1;
    }
  }
    return 0;
}