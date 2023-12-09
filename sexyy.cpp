#include <iostream>
#include <iomanip>
#include <bits/stdc++.h>
#include <vector>
using namespace std;
int main(){
    int n;
    cin>>n;
    int i=1;
    int flag=0;
    for (i = 1; i < n; i++)
    {
        i=i*2;
        flag++;
    }
    int x=n-flag;
    cout<<flag+x;
    return 0;
}